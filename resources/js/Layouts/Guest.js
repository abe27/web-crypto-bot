import { Flex, Stack } from '@chakra-ui/react'

const Guest = ({ children }) => {
  return (
    <>
      <Stack minH={'100vh'} direction={{ base: 'column', md: 'row' }}>
        <Flex p={8} flex={1} align={'center'} justify={'center'}>
          <Stack spacing={4} w={'full'} maxW={'md'}>
            {children}
          </Stack>
        </Flex>
      </Stack>
    </>
  )
}

export default Guest
