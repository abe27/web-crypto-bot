import React, { useEffect, useState } from 'react'
import {
  Button,
  Grid,
  Box,
  FormControl,
  FormLabel,
  Input,
  Select,
  Stack,
  useToast,
} from '@chakra-ui/react'
import { useForm } from '@inertiajs/inertia-react'

const FromInput = () => {
  const { data, setData, post, processing, errors, reset } = useForm({
    exchange_id: '',
    expire_date: '',
    api_key: '',
    api_secret: '',
  })

  const [listExchange, setListExchange] = useState(null)

  const toast = useToast()

  const getExchange = async () => {
    const get = new Promise(async (resolve, reject) => {
      let x = await axios.get(route('api-data.exchange'))
      resolve(await x)
    })

    get.then((r) => {
      setListExchange(r.data.data)
    })
  }

  useEffect(() => {
    return () => {
      reset('exchange_id')
      reset('expire_date')
      reset('api_key')
      reset('api_secret')
    }
  }, [])

  useEffect(() => getExchange(), [])

  const onHandleChange = (e) => {
    setData(e.target.name, e.target.value)
  }

  const submit = (e) => {
    e.preventDefault()
    post(route('api-data.store'), {
      preserveScroll: true,
      resetOnSuccess: false,
      onError: (err) => {
        const er = Object.keys(err)
        er.map((i) => {
          toast({
            title: `${err[i]}`,
            position: 'top-right',
            status: 'error',
            isClosable: true,
          })
        })
      },
      onSuccess: () => {
        toast({
          title: `บันทึกข้อมูลเสร็จแล้ว`,
          position: 'top-right',
          status: 'success',
          isClosable: true
        })
      },
    })
  }

  return (
    <form onSubmit={submit}>
      <div className="">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="my-6 lg:my-2 container mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
            <div></div>
            <div className="mt-6 lg:mt-0">
              <a
                as="button"
                href={route('api-data.index')}
                className="mx-2 my-2 bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-100 rounded text-indigo-700 px-6 py-2 text-sm"
              >
                ย้อนกลับ
              </a>
              <Button
                type="submit"
                isLoading={processing}
                leftIcon={
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    className="icon icon-tabler icon-tabler-device-floppy"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    strokeWidth="2"
                    stroke="currentColor"
                    fill="none"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                    <circle cx="12" cy="14" r="2"></circle>
                    <polyline points="14 4 14 8 8 8 8 4"></polyline>
                  </svg>
                }
                colorScheme="purple"
                variant="solid"
                size="sm"
              >
                บันทึกข้อมูล
              </Button>
            </div>
          </div>
          {/* Page title ends */}
          <div className="container mx-auto">
            <div className="w-full rounded">
              {/* {!data && <Skeletons />} */}
              <Grid columns={2} spacing={10}>
                <Stack direction={['column', 'row']} spacing="24px">
                  <Box>
                    <FormControl isRequired>
                      <FormLabel htmlFor="exchange_id">
                        เลือก Exchange
                      </FormLabel>
                      <Select
                        id="exchange_id"
                        name="exchange_id"
                        placeholder="เลือก Exchange"
                        onChange={onHandleChange}
                        value={data.exchange_id}
                      >
                        {listExchange &&
                          listExchange.map((i) => (
                            <option key={i.id} value={i.id}>
                              {i.name}
                            </option>
                          ))}
                      </Select>
                    </FormControl>
                  </Box>
                  <Box mt={4}>
                    <FormControl isRequired>
                      <FormLabel htmlFor="expire_date">วันที่หมดอายุ</FormLabel>
                      <Input
                        type="date"
                        id="expire_date"
                        name="expire_date"
                        placeholder="ระบุวันที่หมดอายุ"
                        onChange={onHandleChange}
                        value={data.expire_date}
                      />
                    </FormControl>
                  </Box>
                </Stack>
                <Box mt={4}>
                  <FormControl isRequired>
                    <FormLabel htmlFor="api_key">คีย์หลัก(Api Key)</FormLabel>
                    <Input
                      id="api_key"
                      name="api_key"
                      placeholder="ระบุ Api Key"
                      onChange={onHandleChange}
                      value={data.api_key}
                    />
                  </FormControl>
                </Box>
                <Box mt={4}>
                  <FormControl isRequired>
                    <FormLabel htmlFor="api_secret">
                      รหัสลับ(Api Secret)
                    </FormLabel>
                    <Input
                      id="api_secret"
                      name="api_secret"
                      placeholder="ระบุ Api Secret"
                      onChange={onHandleChange}
                      value={data.api_secret}
                    />
                  </FormControl>
                </Box>
              </Grid>
            </div>
          </div>
        </div>
      </div>
    </form>
  )
}

export default FromInput
