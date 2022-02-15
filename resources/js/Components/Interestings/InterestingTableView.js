import {
  Avatar,
  AvatarGroup,
  Table,
  Thead,
  Tbody,
  Tfoot,
  Tr,
  Th,
  Td,
  Flex,
  Text,
  Center,
  Square,
  Tag,
} from '@chakra-ui/react'
import { ButtonIconReload } from '@/Components'
import { ArrowLeftIcon, ArrowRightIcon } from '@chakra-ui/icons'

const capitalize = (s) => s[0].toUpperCase() + s.slice(1).toLowerCase()

const classNames = (...classes) => classes.filter(Boolean).join(' ')

const numberWithCommas = (x) => parseFloat(x).toLocaleString()

const checkBullOrBear = (str) => {
  if (str === 'INTEREST') {
    return (
      <Tag size="sm" colorScheme="green" variant="solid">
        {str}
      </Tag>
    )
  }
  else if (str === 'LONG') {
    return (
      <Tag size="sm" colorScheme="blue" variant="solid">
        {str}
      </Tag>
    )
  }

  return (
    <Tag size="sm" colorScheme="red">
      {str}
    </Tag>
  )
}

const ButtonPagination = ({ i, handleClick }) => {
  // console.log(`url => ${i.url}`)
  if (i.url) {
    if (i.label === 'Next &raquo;') {
      return (
        <button className="btn btn-sm" onClick={() => handleClick(i.url)}>
          <ArrowRightIcon />
        </button>
      )
    }

    if (i.label === '&laquo; Previous') {
      return (
        <button className="btn btn-sm" onClick={() => handleClick(i.url)}>
          <ArrowLeftIcon />
        </button>
      )
    }

    return (
      <button
        onClick={() => handleClick(i.url)}
        className={classNames(i.active ? 'btn-disabled' : '', 'btn btn-sm')}
      >
        {i.label}
      </button>
    )
  }
  return <></>
}

const Pagination = ({ data, handleClick }) => {
  if (data) {
    return data.map((i) => (
      <ButtonPagination key={i.label} i={i} handleClick={handleClick} />
    ))
  }

  return <></>
}

const TableView = ({ interesting, clickNextPage }) => {
  const handleClick = (e) => console.dir(e)
  const pageTo = (e) => clickNextPage(e)
  return (
    <>
      {interesting.data && (
        <Table size="sm">
          <Thead>
            <Tr>
              <Th>ลำดับ</Th>
              <Th>สถาบันแลกเปลี่ยน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>ราคาปัจจุบัน</Th>
              <Th isNumeric>อัตราการเปลี่ยนแปลง</Th>
              <Th>สถานะ</Th>
              <Th>อัพเดทล่าสุดเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Thead>
          <Tbody>
            {interesting.data.map((i, x) => (
              <Tr key={i.id}>
                <Td>{x + 1}</Td>
                <Td>
                  <Flex>
                    <Center>
                      <Avatar size="xs" src={i.exchange_id.image_url} />
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                        {capitalize(i.exchange_id.name)}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td>
                  <Flex>
                    <Center>
                      <AvatarGroup size="xs" max={2}>
                        <Avatar
                          name={i.asset_id.symbol}
                          src={`/storage/crypto/${i.asset_id.symbol.toLowerCase()}.png`}
                        />
                        <Avatar
                          size="xs"
                          name={i.currency_id.currency}
                          src={i.currency_id.flag_url}
                        />
                      </AvatarGroup>
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                        {i.asset_id.symbol}/{i.currency_id.currency}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td isNumeric>{numberWithCommas(i.last_price)}</Td>
                <Td isNumeric>{i.last_percent.toLocaleString()}%</Td>
                <Td>{checkBullOrBear(i.trend)}</Td>
                <Td>{i.updated_at}</Td>
                <Td>
                  <ButtonIconReload handleClick={handleClick} />
                </Td>
              </Tr>
            ))}
          </Tbody>
          <Tfoot>
            <Tr>
              <Th>ลำดับ</Th>
              <Th>สถาบันแลกเปลี่ยน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>ราคาปัจจุบัน</Th>
              <Th isNumeric>อัตราการเปลี่ยนแปลง</Th>
              <Th>สถานะ</Th>
              <Th>อัพเดทล่าสุดเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Tfoot>
        </Table>
      )}

      {interesting.meta && (
        <div className="flex max-w-7xl mx-auto p-6 justify-center">
          <div className="btn-group">
            {interesting.meta.links && (
              <Pagination data={interesting.meta.links} handleClick={pageTo} />
            )}
          </div>
        </div>
      )}
    </>
  )
}

export default TableView
